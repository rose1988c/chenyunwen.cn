<?php

class MenusController extends \BaseController
{
    
    protected $layout = 'layouts.manage';

    /**
     * Display a listing of the resource.
     * GET /menus
     *
     * @return Response
     */
    public function index() {
        $menus = MenuModel::all()->toArray();
        $this->layout->with('title', '菜单列表');
        $this->layout->content = View::make('manage.menus.index')->with(compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /menus/create
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /menus
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     * GET /menus/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /menus/{id}/edit
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id) {
        $menu = MenuModel::find($id)->toArray();
        
        return View::make('manage.menus.edit')->with(compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /menus/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /menus/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id) {
        //
    }

}