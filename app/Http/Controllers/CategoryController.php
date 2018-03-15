<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Get all categories.
     *
     * @param Request $request
     *
     * @return \Illuminate\View
     */
    public function search(Request $request)
    {
        $categories = $this->category->search(
            $request->get('query'),
            $this->getGroupId(
                $request->get('group_name')
            )
        );
        return response()->json($categories);
    }

    /**
     * @param string $group_name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getGroupId($group_name)
    {
        return $this->category->getGroupId($group_name);
    }

    /**
     * Store a task
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $group_id = $this->getGroupId($request->get('group_name'));

        $validator = validator($request->all(), [
            'name' => 'required|unique:categories,name,NULL,id,group_id,'.$group_id,
        ]);

        if ($validator->fails()) {
            return;
        }

        $attributes = [
            'group_id' => $group_id,
            'name' => $request->get('name'),
        ];

        $this->category->create($attributes);
    }

    /**
     * Delete a task
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->category->delete($id);
    }
}
