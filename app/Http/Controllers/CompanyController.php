<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{

    public function index()
    {
        return $this->json(['list' => Company::all()]);
    }


    public function getBy($id) {
        return $this->json(['company' => Company::where('id', $id)->first()]);
    }

    public function companies() {
        return $this->pager('company', 'Компании', false);
    }

    public function create(Request $request, Company $company)
    {
        $company->fill($request->all())->save();
        if ($company->id) {
            return $this->json(['company' => Company::where('id', $company->id)->first()]);
        }
        return $this->json(['err' => 'Не правильные заполнены поля '], 200, false);
    }


    public function edit($id, Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        return view('admin.company.edit', compact('item'));
    }


    public function update(Request $request, Company $company)
    {
        return $company->update($request->all()) ?
            $this->json(['company' => Company::where('id', $request->id)])
            : $this->json(['err' => 'Не правильные заполнены поля '], 200, false);
    }

    public function destroy($id, Company $company)
    {
        return $company->where('id', $id)->delete() ?
            $this->json(['company' => 'Компания удалена из системы!'])
            : $this->json(['err' => 'Не правильные заполнены поля или не найден результать по этому запросу! '], 200, false);
    }
}
