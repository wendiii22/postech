<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select("id", "product_name", "qty", "selling_price", "buying_price")->get();
    }

    public function headings(): array
    {
        return ["ID", "Name Product", "QTY", "Selling Price", "Buying Price"];
    }
}
