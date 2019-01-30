function submit() {

    var checkbox = document.getElementById('checkbox');
    if (checkbox.checked){
        console.log('coche');
        document.getElementById('blocked').disabled = false;

    }else{
        console.log('pas coche :(');
        document.getElementById('blocked').disabled = true;


    }
}

window.onload = submit();


