

let xhr = new XMLHttpRequest();

xhr.open('GET', 'http://localhost/etec-tcc-web/core/php_action/get-propertys.php');

xhr.onreadystatechange = () => {
    if(xhr.readyState == 4) {
        if(xhr.status == 200) {
            var obj = JSON.parse(xhr.response);
            console.log(obj)
        }
    }
};

xhr.send();


