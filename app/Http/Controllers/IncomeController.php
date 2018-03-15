<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\IncomeRepository;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * @var $task
     */
    private $income;

    /**
     * IncomeController constructor.
     *
     * @param IncomeRepository $income
     */
    public function __construct(IncomeRepository $income)
    {
        $this->income = $income;
    }

    /**
     * Store a income
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        dd($request->get('category_id'));
        $validator = validator($request->all(), [
            'category_id' => 'required',
            'amount_b_skat' => 'integer|nullable',
            'amount_a_skat' => 'required|integer',
            'income_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return;
        }

        $incomeDate = [
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
            'amount_b_skat' => $request->get('amount_b_skat'),
            'amount_a_skat' => $request->get('amont_a_skat'),
            'collect_at' => $request->get('income_date'),
            'occurrence' => $request->get('occurrence'),
            'interval' => $request->get('interval'),
            'docs' => $request->get('docs'),
        ];

        $this->income->create($incomeDate);
    }

    /**
     * Delete income
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function delete($id)
    {

    }
}
