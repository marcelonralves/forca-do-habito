<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;

class AdminRepository
{
    private array $pizza;
    private array $countArray;
    private array $customersRegister;

    public function listCount(): array
    {
        $this->countCategory('Grátis');
        $this->countCategory('Normal');
        $this->countCategory('Prêmio');

        return $this->pizza;
    }

    public function countCategory(string $collumn): array|int
    {
        $category = Category::where('title', $collumn)->first();

        if(!$category){
            return $this->pizza[] = 0;
        }
        $pie = Customer::where('category_id', $category->id)->count();

        return $this->pizza[] = $pie;
    }

    public function countTables(): array
    {
        $this->countArray['customers'] = Customer::all()->count();
        $this->countArray['users'] = User::all()->count();
        $this->countArray['categories'] = Category::all()->count();

        return $this->countArray;
    }

    public function countCustomersRegister(): array
    {
        for($i=0; $i <= 7 ; $i++) {
            $this->customersRegister[$i]['count'] = Customer::whereDate('created_at', Carbon::now()->subDays($i))->count();
            $this->customersRegister[$i]['day'] = Carbon::now()->subDays($i)->format('d/M');
        }

        return $this->customersRegister;
    }
}
