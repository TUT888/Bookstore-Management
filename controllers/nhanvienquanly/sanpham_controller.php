<?php
    require_once('base_controller.php');
    require_once('models/SanPham.php');

    
    $name = 'sanpham';
    $action();

    function index() {
        $sanpham = getAll_db();
        if ($sanpham['code'] == 30){
            $data = array('sanpham' => $sanpham['data']);
        }else{
            $data = array();
        }
        render('index', $data);
    }

    function view() {
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
        $sanpham = get_db($id);
        if ($sanpham['code'] == 30){
            $data = array('sanpham' => $sanpham['data']);
        }else{
            $data = array();
        }
        render('view', $data);
    }

    function update() {
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
        if (empty($_POST)){
            $sanpham = get_db($id);
            if ($sanpham['code'] == 30){
                $data = array('sanpham' => $sanpham['data']);
            }else{
                $data = array();
            }
            render('update', $data);
        }else{
            $sanpham = get_db($id);
            $tensp = $_POST['tensp'];
            $gianhap = $_POST['gianhap'];
            $giaban = $_POST['giaban']; 
            $soluong = $_POST['soluong'];
            $mota = $_POST['mota'];
            if ($_FILES['img']['error'] == 4){
                $img = $sanpham['data'][0]['HinhMinhHoa'];
            }else{
                $img = basename($_FILES['img']["name"]);
                if(!file_exists('img/')){
                    mkdir('img/');
                }
                $targetPath = "img/$img";            
                move_uploaded_file($_FILES["img"]["tmp_name"],$targetPath);
            }
            if($sanpham['data'][0]['Loai'] == 'dodunghoctap'){
                $loaisp = $_POST['loaisp']; 
                $nsx = $_POST['nsx'];
                $res = update_ddht_db($id,$tensp,$gianhap,$giaban,$soluong,$loaisp,$nsx,$mota,$img);            
            }else{
                $tacgia = $_POST['tacgia']; 
                $nxb = $_POST['nxb'];
                $theloai = $_POST['theloai'];
                $res = update_sach_db($id,$tensp,$gianhap,$giaban,$soluong,$tacgia,$nxb,$theloai,$mota,$img);
            }
            if ($res['code'] == 30){
                $sanpham = get_db($id);
                $data = array('sanpham' => $sanpham['data'], 'response' => $res);
            }else{
                $data = array('sanpham' => $sanpham['data'],'response' => $res);
            }
            render('update', $data);
        }
        
    }

    function create() {
        if(!empty($_POST['loai'])){
            $loai = $_POST['loai'];
            $tensp = $_POST['tensp'];
            $gianhap =$_POST['gianhap'];
            $giaban = $_POST['giaban'];
            $mota = $_POST['mota'];
            $soluong = $_POST['soluong'];
            $img = basename($_FILES['img']["name"]);
            if(!file_exists('img/')){
                mkdir('img/');
            }
            $targetPath = "img/$img";            
            move_uploaded_file($_FILES["img"]["tmp_name"],$targetPath);
            if($loai == 'dodunghoctap'){
                $loaisp = $_POST['loaisp'];
                $nsx = $_POST['nsx'];
                $res = create_ddht_db($tensp, $mota, $giaban, $gianhap, $soluong, $img, $loai, $loaisp ,$nsx);
            }else{
                $tacgia = $_POST['tacgia'];
                $nxb = $_POST['nxb'];
                $theloai = $_POST['theloai'];
                $res = create_sach_db($tensp, $mota, $giaban, $gianhap, $soluong, $img, $loai, $tacgia,$nxb,$theloai);
            }
            $data = array('response' => $res);
        }else{
            $data = array();
        }
        render('create', $data);
    }

    function delete() {
        $sanpham = getAll_db();
        $data = array('sanpham' => $sanpham['data']);
        if(isset($_POST['id'])&&isset($_POST['loai'])){
            if(!empty($_POST['id'])&&!empty($_POST['loai'])){
                $id = $_POST['id'];
                $loai = $_POST['loai'];
                if($loai == 'dodunghoctap'){
                    $res = delete_ddht_db($id);
                }else{
                    $res = delete_sach_db($id);
                }
                $sanpham = getAll_db();
                $data = array('sanpham' => $sanpham['data'], 'response' => $res);
               
            }
        }
        render('index', $data);
    }

    function search() {
        $pattern = filter_input(INPUT_POST,'search', FILTER_SANITIZE_STRING);
        $sanpham = search_db($pattern);
        if (empty($sanpham["data"]))
        {
            $data = array();
            render('index', $data);
        }
        else {
            $data = array('sanpham' => $sanpham['data']);
            render('index', $data);
        }
    }
?>