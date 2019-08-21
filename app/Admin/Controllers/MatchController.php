<?php

namespace App\Admin\Controllers;

use App\Entities\Match;
use App\Entities\Team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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
    protected function grid()
    {
        $grid = new Grid(new Match);

        $grid->column('id', __('Id'));
        $grid->column('top_team_id', __('Top team'))->display(function () {
            return "<a href=\"/admin/tournaments/teams/{$this->top_team_id}\" target=\"_blank\">" .
                "{$this->topTeam->country}</a>";
        });
        $grid->column('bottom_team_id', __('Bottom team'))->display(function () {
            return "<a href=\"/admin/tournaments/teams/{$this->bottom_team_id}\" target=\"_blank\">" .
                "{$this->bottomTeam->country}</a>";
        });
        $grid->column('top_team_score', __('Top team score'));
        $grid->column('bottom_team_score', __('Bottom team score'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Match::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('top_team_id', __('Top team id'));
        $show->field('bottom_team_id', __('Bottom team id'));
        $show->field('top_team_score', __('Top team score'));
        $show->field('bottom_team_score', __('Bottom team score'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Match);

        $form->select('top_team_id', __('Top team'))->options(Team::dataForSelect());
        $form->select('bottom_team_id', __('Bottom team'))->options(Team::dataForSelect());
        $form->number('top_team_score', __('Top team score'));
        $form->number('bottom_team_score', __('Bottom team score'));

        return $form;
    }
}
