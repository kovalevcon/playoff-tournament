<?php

namespace App\Admin\Controllers;

use App\Entities\TournamentMatch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

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
    protected function grid()
    {
        $grid = new Grid(new TournamentMatch);

        $grid->column('id', __('Id'));
        $grid->column('tournament_id', __('Tournament id'));
        $grid->column('match_id', __('Match id'));
        $grid->column('top_match_id', __('Top match id'));
        $grid->column('bottom_match_id', __('Bottom match id'));
        $grid->column('match_number', __('Match number'));
        $grid->column('stage', __('Stage'));
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
    protected function form()
    {
        $model = new TournamentMatch;
        $form = new Form($model);

        /** @var array $rules */
        $rules = $model->rules();
        $form->number('tournament_id', __('Tournament id'))->rules($rules['tournament_id']);
        $form->number('match_id', __('Match id'));
        $form->number('top_match_id', __('Top match id'));
        $form->number('bottom_match_id', __('Bottom match id'));
        $form->number('match_number', __('Match number'));
        $form->text('stage', __('Stage'));

        return $form;
    }
}
