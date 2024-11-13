<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "select * from tbl_product p inner join tbl_subcategory s on s.subcat_id = p.subcat_id  inner join tbl_category c on c.category_id=s.category_id inner join tbl_trader t on t.trader_id = p.trader_id where true ";
        $row = "SELECT count(*) as count from tbl_product p inner join tbl_subcategory s on s.subcat_id = p.subcat_id inner join tbl_category c on c.category_id = s.category_id inner join tbl_trader t on t.trader_id = p.trader_id where true ";


        if ($_GET["category"] != null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"] != null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND s.subcat_id IN(".$subcategory.")";
            $row = $row." AND s.subcat_id IN(".$subcategory.")";
        }

        if ($_GET["name"] != null) {

            $name = $_GET["name"];
    
            $sqlQry = $sqlQry . " AND product_name LIKE '" . $name . "%'";
        }
        
		//   echo $sqlQry;
        $resultS = $con->query($sqlQry);
        $resultR = $con->query($row);
        
     
	 
        if ($resultR && $resultS) {  // Check if both queries were successful
            $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
            ?>
                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/Product/<?php echo $row1["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcat_name"]; ?><br>
                                        </p>
                                        
                                        <?php
										
											
											$average_rating = 0;
											$total_review = 0;
											$five_star_review = 0;
											$four_star_review = 0;
											$three_star_review = 0;
											$two_star_review = 0;
											$one_star_review = 0;
											$total_user_rating = 0;
											$review_content = array();
										
											$query = "SELECT * FROM tbl_review where product_id = '".$row1["product_id"]."' ORDER BY review_id DESC";
										
											$result = $con->query($query);
										
											while($row = $result->fetch_assoc())
											{
												
										
												if($row["user_rating"] == '5')
												{
													$five_star_review++;
												}
										
												if($row["user_rating"] == '4')
												{
													$four_star_review++;
												}
										
												if($row["user_rating"] == '3')
												{
													$three_star_review++;
												}
										
												if($row["user_rating"] == '2')
												{
													$two_star_review++;
												}
										
												if($row["user_rating"] == '1')
												{
													$one_star_review++;
												}
										
												$total_review++;
										
												$total_user_rating = $total_user_rating + $row["user_rating"];
										
											}
											
											
											if($total_review==0 || $total_user_rating==0 )
											{
												$average_rating = 0 ; 			
											}
											else
											{
												$average_rating = $total_user_rating / $total_review;
											}
											
											?>
                                            <p align="center" style="color:#F96;font-size:20px">
                                           <?php
										   if($average_rating==5 || $average_rating==4.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                               <?php
										   }
										   if($average_rating==4 || $average_rating==3.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==3 || $average_rating==2.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==2 || $average_rating==1.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==1)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==0)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   ?>
                                           
                                        </p>
                                            <?php
										
											$output = array(
												'average_rating'	=>	number_format($average_rating, 1),
												'total_review'		=>	$total_review,
												'five_star_review'	=>	$five_star_review,
												'four_star_review'	=>	$four_star_review,
												'three_star_review'	=>	$three_star_review,
												'two_star_review'	=>	$two_star_review,
												'one_star_review'	=>	$one_star_review,
												'review_data'		=>	$review_content
											);

                                           
                                            $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $row1["product_id"] . "'";
											$result2 = $con -> query($stock);
                            				$row2 = $result2 -> fetch_assoc();


                                            $stocka = "select sum(cart_quantity) as stock from tbl_cart where product_id = '" . $row1["product_id"] . "'";
                                            $result2a = $con -> query($stocka);
                                           $row2a = $result2a -> fetch_assoc();

                                           $stock = $row2["stock"] - $row2a["stock"];
										   if ($stock > 0) {
                                            ?>
                                                <a href="javascript:void(0)" onclick="addCart('<?php echo $row1['product_id'] ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                            <?php
                                            } else if ($stock == 0) {
                                            ?>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    } else {
                        echo "<h4 align='center'>Products Not Found!!!!</h4>";
                    }
                } else {
                    echo "Error executing queries.";
                }
            }
            ?>