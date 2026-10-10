<?php

class Pager
{
    private int $tongDong;
    private int $soDongMoiTrang;
    private int $trangHienTai;
    private int $tongTrang;

    public function __construct(int $tongDong, int $soDongMoiTrang = 2)
    {
        $this->tongDong = $tongDong;
        $this->soDongMoiTrang = $soDongMoiTrang;

        $this->tongTrang = (int) ceil($this->tongDong / $this->soDongMoiTrang);

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        if ($page < 1) {
            $page = 1;
        }

        if ($this->tongTrang > 0 && $page > $this->tongTrang) {
            $page = $this->tongTrang;
        }

        $this->trangHienTai = $page;
    }

    public function getOffset(): int
    {
        return ($this->trangHienTai - 1) * $this->soDongMoiTrang;
    }

    public function getLimit(): int
    {
        return $this->soDongMoiTrang;
    }

    public function getTrangHienTai(): int
    {
        return $this->trangHienTai;
    }

    public function hienThiDanhSachTrang(): void
    {
        if ($this->tongTrang <= 1) {
            return;
        }

        echo '<div class="phan-trang">';

        for ($i = 1; $i <= $this->tongTrang; $i++) {
            if ($i == $this->trangHienTai) {
                echo '<span class="trang-hien-tai">' . $i . '</span>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }

        echo '</div>';
    }
}
