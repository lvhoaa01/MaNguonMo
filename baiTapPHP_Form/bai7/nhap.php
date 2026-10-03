<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Phép tính trên hai số</title>

    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <form method="POST" action="ketqua.php">

        <table>

            <tr>
                <th colspan="2" class="table_tittle">
                    PHÉP TÍNH TRÊN HAI SỐ
                </th>
            </tr>

            <tr>
                <td>Chọn phép tính:</td>

                <td>
                    <input type="radio"
                        name="phep_tinh"
                        value="cong"
                        checked>
                    Cộng

                    <input type="radio"
                        name="phep_tinh"
                        value="tru">
                    Trừ

                    <input type="radio"
                        name="phep_tinh"
                        value="nhan">
                    Nhân

                    <input type="radio"
                        name="phep_tinh"
                        value="chia">
                    Chia
                </td>
            </tr>

            <tr>
                <td>Số thứ nhất:</td>

                <td>
                    <input type="number"
                        step="any"
                        name="so_thu_nhat">
                </td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>

                <td>
                    <input type="number"
                        step="any"
                        name="so_thu_hai">
                </td>
            </tr>

            <tr>
                <td colspan="2" class="center">
                    <input type="submit"
                        value="Tính">
                </td>
            </tr>

        </table>

    </form>

</body>

</html>