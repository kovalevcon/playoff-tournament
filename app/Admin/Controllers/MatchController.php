<?php
declare(strict_types=1);
namespace App\Admin\Controllers;

use App\Entities\Match;
use App\Entities\Team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class MatchController
 *
 * @package App\Admin\Controllers
 */
class MatchController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Matches';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        /** @var Grid $grid */
        $grid = new Grid(new Match);

        $grid->column('id', __('Id'));
        $grid->column('top_team_id', __('Top team'))->display(function () {
            return '<a href="' . route('teams.show', ['team' => $this->top_team_id]) . '" target="_blank">' .
                "{$this->topTeam->country}</a>";
        });
        $grid->column('bottom_team_id', __('Bottom team'))->display(function () {
            return '<a href="' . route('teams.show', ['team' => $this->bottom_team_id]) . '" target="_blank">' .
                "{$this->bottomTeam->country}</a>";
        });
        $grid->column('top_team_score', __('Top team score'));
        $grid->column('bottom_team_score', __('Bottom team score'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->like('top_team_id', 'Top team id');
            $filter->like('bottom_team_id', 'Bottom team id');
            $filter->like('top_team_score', 'Top team score');
            $filter->like('bottom_team_score', 'Bottom team score');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param int $id
     * @return Show
     */
    protected function detail(int $id): Show
    {
        /** @var Show $show */
        $show = new Show(Match::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('top_team_id', __('Top team id'));
        $show->field('bottom_team_id', __('Bottom team id'));
        $show->field('top_team_score', __('Top team score'));
        $show->field('bottom_team_score', __('Bottom team score'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        /** @var Form $form */
        $form = new Form(new Match);

        $form->select('top_team_id', __('Top team'))
            ->options(Team::dataForSelect())
            ->rules(Match::getRule('top_team_id'))
        ;
        $form->select('bottom_team_id', __('Bottom team'))
            ->options(Team::dataForSelect())
            ->rules(Match::getRule('bottom_team_id'))
        ;
        $form->number('top_team_score', __('Top team score'))
            ->rules(Match::getRule('top_team_score'));
        $form->number('bottom_team_score', __('Bottom team score'))
            ->rules(Match::getRule('bottom_team_score'));

        return $form;
    }
}
