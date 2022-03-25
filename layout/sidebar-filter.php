<?php $list_product_cat=get_list_product_cat(); 
    $id=$_GET['id'];
    $type=$_GET['type'];
?>
<div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="0"></td>
                            <td>Tất cả</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="1" ></td>
                            <td>Dưới 500.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="2" ></td>
                            <td>500.000đ - 1.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="3"></td>
                            <td>1.000.000đ - 5.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="4" ></td>
                            <td>5.000.000đ - 10.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" class="filter" data-id="<?php echo $id ?>" data-type="<?php echo $type ?>" data-filter="5" ></td>
                            <td>Trên 10.000.000đ</td>
                        </tr>
                            </tbody>
                        </table>
                        
                    </form>
                </div>
            </div>