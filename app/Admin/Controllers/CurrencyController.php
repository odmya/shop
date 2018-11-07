<?php

namespace App\Admin\Controllers;

use App\Models\Currency;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CurrencyController extends Controller
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
     * @param mixed   $id
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
     * @param mixed   $id
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
        $grid = new Grid(new Currency);

        $grid->id('Id');
        $grid->title('Title');
        $grid->code('Code');
        $grid->symbol_left('Symbol left');
        $grid->symbol_right('Symbol right');
        $grid->decimal_place('Decimal place');
        $grid->value('Value');
        $grid->status('Status');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Currency::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->code('Code');
        $show->symbol_left('Symbol left');
        $show->symbol_right('Symbol right');
        $show->decimal_place('Decimal place');
        $show->value('Value');
        $show->status('Status');
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
        $form = new Form(new Currency);

        $form->text('title', 'Title');
        $form->text('code', 'Code');
        $form->text('symbol_left', 'Symbol left');
        $form->text('symbol_right', 'Symbol right');
        $form->text('decimal_place', 'Decimal place')->default('2');
        $form->decimal('value', 'Value');
        $form->switch('status', 'Status');

        return $form;
    }
}
