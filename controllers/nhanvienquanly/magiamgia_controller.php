<?php
    require_once('base_controller.php');
    require_once('models/MaGiamGia.php');

    
    $name = 'magiamgia';
    $action();

    function index() {
        $magiamgia = getAll_db();
        $data = array('magiamgia' => $magiamgia);
        render('index', $data);
    }

    function view() {
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
        $magiamgia = get_db($id);
        $data = array('chitiet' => $magiamgia);
        render('view', $data);
    }

    function update() {
        $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
        $id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
        $tenma = filter_input(INPUT_POST,'tenma', FILTER_SANITIZE_STRING);
        if (!empty($tenma)) {
            $giatri = filter_input(INPUT_POST,'giatri', FILTER_SANITIZE_STRING);
            if (!empty($giatri)) {
                $ngaylap = new DateTime (filter_input(INPUT_POST,'ngaylap', FILTER_SANITIZE_STRING), $tz);
                $ngayhethan = new DateTime (filter_input(INPUT_POST,'ngayhethan', FILTER_SANITIZE_STRING), $tz);
                if ($ngayhethan >= $ngaylap) {
                    $mota = filter_input(INPUT_POST,'mota', FILTER_SANITIZE_STRING);
                    if (empty($mota)) {
                        $mota = "null";
                    }
                    $check = filter_input(INPUT_POST,'check', FILTER_SANITIZE_STRING);
                    $ngaytaoma = $ngaylap->format ('Y-m-d H:i:s');
                    $ngayhethanma = $ngayhethan->format ('Y-m-d H:i:s');
                    $result = update_db($id, $tenma, $giatri, $ngaytaoma, $ngayhethanma, $mota, $check);
                    $data = array('capnhat' => $result);
                    render('update', $data);
                }
                else {
                    $error = array("error" => "Ngày hết hạn bé hơn ngày tạo mã");
                    render ("update", $error);
                }
            }
            else {
                $error = array("error" => "Không được để rỗng giá trị");
                render ("update", $error);
            }
        }
        else {
            $error = array("error" => "Không được để rỗng tên mã");
            render ("update", $error);
        }
    }

    function create() {
        if (!isset($_POST) || empty($_POST)) {
            $max_id = ((int)substr(get_max_id_db()["id"]["max(MaSoMa)"], 3, 7)) + 1;
            if ($max_id < 10) {
                $max_id = "MGG000000" . $max_id;
            }
            else if ($max_id >= 10 && $max_id < 100) {
                $max_id = "MGG00000" . $max_id;
            }
            else if ($max_id >= 100 && $max_id < 1000) {
                $max_id = "MGG0000" . $max_id;
            }
            else if ($max_id >= 1000 && $max_id < 10000) {
                $max_id = "MGG000" . $max_id;
            }
            else if ($max_id >= 10000 && $max_id < 100000) {
                $max_id = "MGG00" . $max_id;
            }
            else if ($max_id >= 100000 && $max_id < 1000000) {
                $max_id = "MGG0" . $max_id;
            }
            else if ($max_id >= 1000000 && $max_id < 10000000) {
                $max_id = "MGG" . $max_id;
            }
            $data = array("id" => $max_id);
            render ('create', $data);
        }
        else {
            $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
            $id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
            $tenma = filter_input(INPUT_POST,'tenma', FILTER_SANITIZE_STRING);
            if (!empty($tenma)) {
                $giatri = filter_input(INPUT_POST,'giatri', FILTER_SANITIZE_STRING);
                if (!empty($giatri)) {
                    if (isset($_POST["ngaylap"]) && isset($_POST["ngayhethan"]) && !empty($_POST["ngaylap"]) && !empty($_POST["ngayhethan"])) {
                        $ngaylap = new DateTime (filter_input(INPUT_POST,'ngaylap', FILTER_SANITIZE_STRING), $tz);
                        $ngayhethan = new DateTime (filter_input(INPUT_POST,'ngayhethan', FILTER_SANITIZE_STRING), $tz);
                        if ($ngayhethan > $ngaylap) {
                            $mota = filter_input(INPUT_POST,'mota', FILTER_SANITIZE_STRING);
                            if (empty($mota) || $mota == "") {
                                $mota = "null";
                            }
                            $ngaytaoma = $ngaylap->format ('Y-m-d H:i:s');
                            $ngayhethanma = $ngayhethan->format ('Y-m-d H:i:s');
                            $result = add_db($id, $tenma, $giatri, $ngaytaoma, $ngayhethanma, $mota);
                            $data = array('taomgg' => $result);
                            render('create', $data);
                        }
                        else {
                            $error = array("0" => "Ngày hết hạn trùng hoặc bé hơn ngày tạo mã");
                            render ("create", $error);
                        }
                    }
                    else {
                        $error = array("1" => "Vui lòng nhập đầy đủ ngày tháng cho ngày tạo mã và ngày hết hạn mã");
                        render ("create", $error);
                    }
                }
                else {
                    $error = array("2" => "Không được để rỗng giá trị");
                    render ("create", $error);
                }
            }
            else {
                $error = array("3" => "Không được để rỗng tên mã");
                render ("create", $error);
            }
        }
    }

    function delete() {
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
        $result = delete_db($id);
        if ($result["code"] == 1) {
            $magiamgia = getAll_db();
            $data = array("code" => 1, 'magiamgia' => $magiamgia);
            render('index', $data);
        }
    }

    function search() {
        $pattern = filter_input(INPUT_POST,'search', FILTER_SANITIZE_STRING);
        $magiamgia = search_db($pattern);
        if (empty($magiamgia["data"]))
        {
            $data = array("code" => 0, 'magiamgia' => $magiamgia);
            render('index', $data);
        }
        else {
            $data = array('magiamgia' => $magiamgia);
            render('index', $data);
        }
    }
?>