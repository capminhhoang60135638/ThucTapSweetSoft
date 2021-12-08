<?php
    class nhanvien{
        public $nhanvien_id,$nhanvien_ho,$nhanvien_ten,$nhanvien_sdt,$nhanvien_gioitinh,$nhanvien_loai,$user_id;

        public function __construct($id,$ho,$ten,$sdt,$gt,$loai,$user_id)
        {
            $this->nhanvien_id=$id;
            $this->nhanvien_ho=$ho;
            $this->nhanvien_ten=$ten;
            $this->nhanvien_sdt=$sdt;
            $this->nhanvien_gioitinh=$gt;
            $this->nhanvien_loai=$loai;
            $this->user_id=$user_id;
        }
    }
?>