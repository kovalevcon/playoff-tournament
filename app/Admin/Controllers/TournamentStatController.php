<?php

namespace App\Admin\Controllers;

use App\Entities\TournamentStat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TournamentStatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tournament statistics';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TournamentStat);

        $grid->column('id', __('Id'));
        $grid->column('tournament_id', __('Tournament id'));
        $grid->column('team_id', __('Team id'));
        $grid->column('count_matches', __('Count matches'));
        $grid->column('place_in_tournament', __('Place in tournament'));
        $grid->column('count_score', __('Count score'));
        $grid->column('average_score', __('Average score'));
        $grid->column('high_score', __('High score'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
        });

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
        $show = new Show(TournamentStat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tournament_id', __('Tournament id'));
        $show->field('team_id', __('Team id'));
        $show->field('count_matches', __('Count matches'));
        $show->field('place_in_tournament', __('Place in tournament'));
        $show->field('count_score', __('Count score'));
        $show->field('average_score', __('Average score'));
        $show->field('high_score', __('High score'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TournamentStat);

        $form->number('tournament_id', __('Tournament id'));
        $form->number('team_id', __('Team id'));
        $form->switch('count_matches', __('Count matches'));
        $form->switch('place_in_tournament', __('Place in tournament'))->default(16);
        $form->switch('count_score', __('Count score'));
        $form->decimal('average_score', __('Average score'))->default(0.00);
        $form->switch('high_score', __('High score'));

        return $form;
    }
}
