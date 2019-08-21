<?php
declare(strict_types=1);
namespace App\Admin\Controllers;

use App\Entities\Tournament;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class TournamentController
 *
 * @package App\Admin\Controllers
 */
class TournamentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tournaments';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        /** @var Grid $grid */
        $grid = new Grid(new Tournament);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->like('name', 'Name');
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
        $show = new Show(Tournament::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
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
        $form = new Form(new Tournament);

        $form->text('name', __('Name'))->rules(Tournament::getRule('name'));

        return $form;
    }
}
