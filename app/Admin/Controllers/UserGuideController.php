<?php

namespace App\Admin\Controllers;

use App\Models\UserGuide;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserGuideController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserGuide);

        $grid->id('Id');
        $grid->title('Title');
        $grid->slug('Slug');
        $grid->description('Description');
        $grid->seo_title('Seo title');
        $grid->seo_keyword('Seo keyword');
        $grid->seo_description('Seo description');
        $grid->prev_item('Prev item');
        $grid->next_item('Next item');
        $grid->sort('Sort');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(UserGuide::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->slug('Slug');
        $show->description('Description');
        $show->seo_title('Seo title');
        $show->seo_keyword('Seo keyword');
        $show->seo_description('Seo description');
        $show->prev_item('Prev item');
        $show->next_item('Next item');
        $show->sort('Sort');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserGuide);

        $userguide = UserGuide::get()->pluck('title','id');

        $form->text('title', 'Title');
        //$form->text('slug', 'Slug');

        $form->editor('description', 'Description');
        $form->text('seo_title', 'Seo title');
        $form->text('seo_keyword', 'Seo keyword');
        $form->text('seo_description', 'Seo description');
        $form->select('prev_item', 'Prev item')->options($userguide);
        $form->select('next_item', 'Next item')->options($userguide);
        $form->number('sort', 'Sort');

        return $form;
    }
}
