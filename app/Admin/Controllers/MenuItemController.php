<?php

namespace App\Admin\Controllers;

use App\Models\MenuItem;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MenuItemController extends Controller
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
        $grid = new Grid(new MenuItem);

        $grid->id('Id');
        $grid->label('Label');
        $grid->link('Link');
        $grid->parent('Parent')->display(function ($parent) {
              if($parent){
                return MenuItem::find($parent)->label;
              }else{
                return "";
              }

            });
        $grid->sort('Sort');
        $grid->class('Class');
        $grid->icon('Icon');
        $grid->menu_id('Menu')->display(function ($menu) {
              if($menu){
                return Menu::find($menu)->name;
              }else{
                return "";
              }

            });
        $grid->depth('Depth');
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
        $show = new Show(MenuItem::findOrFail($id));

        $show->id('Id');
        $show->label('Label');
        $show->link('Link');
        $show->parent('Parent');
        $show->sort('Sort');
        $show->class('Class');
        $show->icon('Icon');
        $show->menu_id('Menu id');
        $show->depth('Depth');
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
        $form = new Form(new MenuItem);
        $menuitem = MenuItem::get()->pluck('label','id');
        $menu_name = Menu::get()->pluck('name','id');
        $form->text('label', 'Label');
        $form->url('link', 'Link');
        //$form->number('parent', 'Parent');
        $form->select('parent', 'parent')->options($menuitem);
        $form->select('menu_id', 'Menu')->options($menu_name);
        $form->number('sort', 'Sort');
        $form->text('class', 'Class');
        $form->text('icon', 'Icon');
        $form->select('menu_id', 'Menu')->options($menu_name);
        $form->number('depth', 'Depth');

        return $form;
    }
}
