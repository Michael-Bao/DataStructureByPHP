<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/4
 * Time: 17:16
 */
Class BankAccount
{
    private $balance;

    public function __construct($balance = 1000)
    {
        $this->balance = $balance;
    }

    //做一些事情
    public function withdrawBalance($amount)
    {
        if ($amount > $this->balance) {
            throw new \Exception('the amount is bigger than available balance');
        }

        $this->balance -= $amount;
    }

    public function depositBalance($amount)
    {
        $this->balance += $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

try {
    $bankAccount = new BankAccount(600);

    //买了一双鞋
    $shoesPrice = 700;
    $bankAccount->withdrawBalance($shoesPrice);

    //获取结余
    $balance = $bankAccount->getBalance();
    echo $balance;
} catch (\Exception $e) {
    echo $e->getMessage();
    echo "<br/>";
    echo $e;
}





