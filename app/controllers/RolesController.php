<?php

class RolesController extends \BaseController
{
    
    protected $layout = 'layouts.manage';

    /**
     * Display a listing of the resource.
     * GET /roles
     *
     * @return Response
     */
    public function index() {
        
        $roles = RoleModel::all()->toArray();
        
        $this->layout->with('title', '角色列表');
        $this->layout->content = View::make('manage.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /roles/create
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /roles
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     * GET /roles/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /roles/{id}/edit
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /roles/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /roles/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id) {
        //
    }

}