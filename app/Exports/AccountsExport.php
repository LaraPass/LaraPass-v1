<?php

namespace App\Exports;

use Auth;
use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountsExport implements FromCollection, WithHeadings
{
    /*
     * Adding Heading row to the excel output
     */
    public function headings(): array
    {
        return [
           'Account_id', 'User_id', 'Title', 'Category_id', 'Link', 'Username', 'Password', 'Notes', 'Created_at', 'Updated_at'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $accounts = Account::where('user_id',Auth::user()->id)->get();
        
        foreach($accounts as $account)
        {
            if($account->folder->isEmpty())
                $a[] = $account;
            else
            {
                if($account->folder[0]->password == null)
                    $a[] = $account;
                else
                    $a[] = [$account->id, $account->user_id, '### ACCOUNT SECURED IN A PASSWORD PROTECTED FOLDER ###'];
            }
        }

        $collection = collect($a);
            
        return $collection;
    }

}