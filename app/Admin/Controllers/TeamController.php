<?php
declare(strict_types=1);
namespace App\Admin\Controllers;

use App\Entities\Team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class TeamController
 *
 * @package App\Admin\Controllers
 */
class TeamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Teams';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        /** @var Grid $grid */
        $grid = new Grid(new Team);

        $grid->column('id', __('Id'));
        $grid->column('country', __('Country'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->like('country', 'County');
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
        $show = new Show(Team::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('country', __('Country'));
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
        $form = new Form(new Team);

        $form->text('country', __('Country'))->rules(Team::getRule('country'));

        return $form;
    }
}
