var Account= {
    title:"Usman Sher",
    currency:"0",
    balance:0,
    IBAN:"PKN12234567"
};

var month = ["January", "Febrary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

document.getElementById("title").innerHTML=Account.title;
document.getElementById("currency").innerHTML=Account.currency;
document.getElementById("balance").innerHTML=Account.balance;
document.getElementById("IBAN").innerHTML=Account.IBAN;

function deposit() {
    var d = document.getElementById("Deposit Amount");
    if(event.keyCode===13){
        Account.balance = Account.balance + parseInt(document.getElementById("deposit").value);
        document.getElementById("balance").innerHTML=Account.balance;
        printTransection(Account.balance, "Debit");
    }
}

function withdraw() {
    var d=document.getElementById("Deposit Amount");
    if(event.keyCode===13){
        Account.balance =Account.balance - parseInt(document.getElementById("withdraw").value);
        document.getElementById("balance").innerHTML=Account.balance;
        printTransection(Account.balance, "Credit");
    }

}

function printTransection(amt, T)
{
    var date = new Date();
    var Transection = {
        month: date.getMonth(),
        day: date.getDate(),
        year: date.getFullYear(),
        hour: date.getHours(),
        minute: date.getMinutes(),
        second: date.getSeconds(),
        amount: amt,
        type: T
    };

    var myTable = document.getElementById('transaction-table');
    myTable.innerHTML += '<tr><td>' + month[Transection.month] + " " + Transection.day + ", " + Transection.year + " " + Transection.hour + ":" + Transection.minute + ":"  + Transection.second + '</td><td>'+ T +'</td><td>'+ amt +'</td></tr>';
    document.querySelector('#deposit').value = "";
    document.querySelector('#withdraw').value = "";
    document.querySelector('#deposit-msg').innerHTML = "";
    document.querySelector('#withdraw-msg').innerHTML = "";
}