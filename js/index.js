function Menu(){
    if (document.getElementById('menu-responsive').style.display == 'block'){
        document.getElementById('menu-responsive').style.animation = 'closeMenu 0.5s forwards';

        setTimeout(() => {
            document.getElementById('menu-responsive').style.display = 'none';
        }, 1000);
    } else {
        document.getElementById('menu-responsive').style.animation = 'openMenu 0.5s forwards';
        document.getElementById('menu-responsive').style.display = 'block';
    }
}

function Confirm(pTxtUser, pTxtCorreo, pTxtRol){
    if (document.getElementById('confirm').style.display == 'block'){
        document.getElementById('confirm').style.display = 'none';
    } else {
        document.getElementById('confirm').style.display = 'block';
        document.getElementById('txtUser').innerHTML = pTxtUser;
        document.getElementById('txtCorreo').value = pTxtCorreo;
        document.getElementById('txtRol').value = pTxtRol;
    }
}

function ConfirmProvider(pTxtNombreProveedor, pTxtNombreContacto){
    if (document.getElementById('confirm-provider').style.display == 'block'){
        document.getElementById('confirm-provider').style.display = 'none';
    } else {
        document.getElementById('confirm-provider').style.display = 'block';
        document.getElementById('txtNombreTitulo').innerHTML = pTxtNombreProveedor;
        document.getElementById('txtNombreProveedor').value = pTxtNombreProveedor;
        document.getElementById('txtNombreContacto').value = pTxtNombreContacto;
    }
}

function ConfirmProdu(pNombreProducto,pNombreReferencia){
    if (document.getElementById('confirm-product').style.display == 'block'){
        document.getElementById('confirm-product').style.display = 'none';
    } else {
        document.getElementById('confirm-product').style.display = 'block';
        document.getElementById('nombreProducto').innerHTML = pNombreProducto;
        document.getElementById('nombreProductox').value = pNombreProducto;
        document.getElementById('nombreReferencia').value = pNombreReferencia;
    
    }
}

function EditsUser(pDniUsuario,pNombreUsuario,pTelefonoUsuario,pDireccionUsuario){
    if (document.getElementById('EditsUsers').style.display == 'block'){
        document.getElementById('EditsUsers').style.display = 'none';
    } else {
        document.getElementById('EditsUsers').style.display = 'block';
        document.getElementById('dniPerson').value = pDniUsuario;
        document.getElementById('nombrePerson').value = pNombreUsuario;
        document.getElementById('telefonoPerson').value = pTelefonoUsuario;
        document.getElementById('direccionPerson').value = pDireccionUsuario;
        
    
    }
}

function ShowObject(pIdObject){
    if (document.getElementById(pIdObject).style.display == "block"){
        document.getElementById(pIdObject).style.display = "none";
    } else {
        document.getElementById(pIdObject).style.display = "block";
    }
}

function ChangeImage(){
    document.getElementById('foto').style.backgroundImage = 'url(' + URL.createObjectURL(document.getElementById('foto').files[0]) + ')';
}

var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
      , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="https://www.w3.org/TR/html40/"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(table, name) {
      if (!table.nodeType) table = document.getElementById(table)
      var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      window.location.href = uri + base64(format(template, ctx))
    }
  })()