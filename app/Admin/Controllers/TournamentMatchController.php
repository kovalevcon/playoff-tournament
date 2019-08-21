<?php
declare(strict_types=1);
namespace App\Admin\Controllers;

use App\Entities\Match;
use App\Entities\Tournament;
use App\Entities\TournamentMatch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class TournamentMatchController
 *
 * @package App\Admin\Controllers
 */
class TournamentMatchController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tournament matches';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        /** @var Grid $grid */
        $grid = new Grid(new TournamentMatch);

        $grid->column('id', __('Id'));
        $grid->column('tournament_id', __('Tournament id'))->display(function () {
            return '<a href="' . route('tournaments.show', ['tournament' => $this->tournament_id]) .
                "\" target=\"_blank\">{$this->tournament->name}</a>";
        });
        $grid->column('match_id', __('Match id'))->display(function () {
            return '<a href="' . route('matches.show', ['match' => $this->match_id]) .
                "\" target=\"_blank\">{$this->match->label()}</a>";
        });
        $grid->column('top_match_id', __('Prev top match id'))->display(function () {
            return '<a href="' . route('matches.show', ['match' => $this->top_match_id]) .
                "\" target=\"_blank\">{$this->top_match_id}</a>";
        });
        $grid->column('bottom_match_id', __('Prev bottom match id'))->display(function () {
            return '<a href="' . route('matches.show', ['match' => $this->bottom_match_id]) .
                "\" target=\"_blank\">{$this->bottom_match_id}</a>";
        });
        $grid->column('match_number', __('Match number'));
        $grid->column('stage', __('Stage'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->like('tournament_id', 'Tournament id');
            $filter->like('match_id', 'Match id');
            $filter->like('top_match_id', 'Top match id');
            $filter->like('bottom_match_id', 'Bottom match id');
            $filter->like('match_number', 'Match number');
            $filter->like('stage', 'Stage');
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
        $show = new Show(TournamentMatch::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tournament_id', __('Tournament id'));
        $show->field('match_id', __('Match id'));
        $show->field('top_match_id', __('Top match id'));
        $show->field('bottom_match_id', __('Bottom match id'));
        $show->field('match_number', __('Match number'));
        $show->field('stage', __('Stage'));
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
        $form = new Form(new TournamentMatch);

        $form->select('tournament_id', __('Tournament id'))
            ->options(Tournament::dataForSelect())
            ->rules(TournamentMatch::getRule('tournament_id'));
        $form->select('match_id', __('Match id'))
            ->options(Match::dataForSelect())
            ->rules(TournamentMatch::getRule('match_id'));
        $form->select('top_match_id', __('Top match id'))
            ->options(Match::dataForSelect())
            ->rules(TournamentMatch::getRule('top_match_id'));
        $form->select('bottom_match_id', __('Bottom match id'))
            ->options(Match::dataForSelect())
            ->rules(TournamentMatch::getRule('bottom_match_id'));
        $form->select('match_number', __('Match number'))
            ->options(TournamentMatch::dataMatchNumberForSelect())
            ->rules(TournamentMatch::getRule('match_number'));
        $form->select('stage', __('Stage'))
            ->options(TournamentMatch::dataStageForSelect())
            ->rules(TournamentMatch::getRule('stage'));

        return $form;
    }
}
