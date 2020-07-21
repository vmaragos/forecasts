// alert('this');

// var btn1 = document.getElementById("button1");
// var status = 0;
// var btn2;
// var red = "rgb(255, 0, 0)";

// var status = 0;

// document.getElementById("#middle-box").style.top = "10%";
// alert('this');


function select0()
{
    
}

function select1()
{
    
}

function tabClick1()
{
    let btn1 = document.getElementById("button1");
    var status;

    if (btn1.style.backgroundColor == "red")
    {
        status = 1;
    }
    else
    {
        status = 0;
    }
    
    switch(status)
    {
        case 0:
            btn1.style.backgroundColor = "red";
            status = 1;
            break;
        case 1:
            btn1.style.backgroundColor = "transparent";
            status = 0;
            break;
    }
}

function tabClick2()
{
    // document.getElementById("button-2").style.backgroundColor = red;
}

function middleFocus()
{
    // document.getElementById("middle").style.backgroundColor = "rgba(255, 255, 255, 0.7)";
    // alert(1);
}

function middleFocusOut()
{
    // document.getElementById("middle").style.backgroundColor = "transparent";
}