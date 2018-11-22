<?php

namespace App\Admin\Controllers;

use App\Models\Tip;
use App\Models\TipCategory;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TipsController extends Controller
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
        $grid = new Grid(new Tip);

        $grid->id('Id');
        $grid->title('Title');
        $grid->slug('Slug');
        $grid->description('Description');
        $grid->seo_title('Seo title');
        $grid->seo_keyword('Seo keyword');
        $grid->seo_description('Seo description');
        $grid->displayed('Displayed');
        $grid->category_id('Category id');
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
        $show = new Show(Tip::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->slug('Slug');
        $show->description('Description');
        $show->seo_title('Seo title');
        $show->seo_keyword('Seo keyword');
        $show->seo_description('Seo description');
        $show->displayed('Displayed');
        $show->category_id('Category id');
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
        $form = new Form(new Tip);

        $form->text('title', 'Title');
        //$form->text('slug', 'Slug');
        $form->ckeditor('description', 'Description');
        $form->text('seo_title', 'Seo title');
        $form->text('seo_keyword', 'Seo keyword');
        $form->text('seo_description', 'Seo description');
        $form->switch('displayed', 'Displayed')->default(1);
        $form->select('category_id',"category")->options(TipCategory::all()->pluck('title', 'id'));

        return $form;
    }
}
