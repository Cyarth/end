/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function suma()
{
    var num1=Number(document.getElementById('n1').value);
    var num2=Number(document.getElementById('n2').value);
    var totalpago=num1*num2*1000;
    document.getElementById('totalpago').value=totalpago;
}


