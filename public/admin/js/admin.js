
function change(choose){
    var e = document.getElementById("style-title");
    if(choose == 1){
        e.style.backgroundColor='rgb(5, 138, 254)';
    }
    else{
        e.style.backgroundColor= 'rgb(173, 173, 173)';
    }
}
function toggle_visibility(id,icon) {
    var icon = document.getElementById(icon);
    var e = document.getElementById(id);
    if(e.style.display == 'none'){
        e.style.display = 'block';
    }
    else
    {
        e.style.display = 'none';
    }
}
function kiemtradangnhap(){
    var inputten = document.forms["form_add_title"]["txt"];
    var giatri = inputten.value;
    var theP = document.getElementById("thongbao");
    if(giatri == ""){
        theP.style.display      = "block";
        theP.style.marginTop    = "1%"
        theP.innerHTML          = "Nhâp vào tiêu đề cần thêm nội dung";
        theP.style.color        = "red";
        return false;
    }
    else{
        theP.style.display = "none";
        return true;
    }
}