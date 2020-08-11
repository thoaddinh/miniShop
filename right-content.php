<?php
require 'connect.php' ;
if(isset($_POST['id']))
{

    $id = $_POST['id'];

    $item_per_page = 6;
   $current_page = $_POST['page'];
   $offset = ($current_page - 1)* $item_per_page;
   $total_records = mysqli_query($conn,"select * from san_pham where maloai like '$id%'"  );
   
   $total_records = $total_records->num_rows;
   $total_pages = ceil($total_records/ $item_per_page);
   
$product = mysqli_query($conn,"select * from san_pham where maloai like '$id%' order by dongia ".$_POST['sort']." limit $offset, $item_per_page " );


echo '<div>
                    <ol class="breadcrumb" id="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active" id = "'.$id.'">'; 
                        if(strlen($id) == 3)
                        {
                            if($id=="MP%") echo "Mỹ phẩm";
                            if($id=="NH%") echo "Nước hoa";
                            if($id=="TP%") echo "Thực phẩm";
                        }
                        else
                        {
                            $tenloai = mysqli_query($conn,"select * from loai_sp");
                            while ($row1 = mysqli_fetch_array($tenloai)) 
                            {
                                if ($row1[0] == $id) {
                                    echo $row1[1];
                                }
                                
                            }
                        }
                         echo'</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>'.$total_records.'  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id ="sort">
                                <li id="asc">By Price Low</li>
                                <li class="divider"></li>
                                <li id="desc">By Price High</li>
                                <li class="divider"></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
              
                
                <div class="row">';

                  while ($row= mysqli_fetch_array($product)) 
                        {
                          
                        echo '  <div class="col-md-4 text-center col-sm-6 col-xs-6">
                            <div class="thumbnail product-box">
                                <img src="assets/img/'.$row['hinh'].'" alt="" />
                                <div class="caption">
                                    <div class="name-product"><h3><a href="#">'.$row['tensp'].'</a></h3></div>
                                    <p>Price : <strong>'.number_format($row['dongia'],0,",",".").' VNĐ</strong>  </p>
                                    
                                    <p><a href="cart.php?action=add&id='.$row['Masp'].'" class="btn btn-success" role="button">Add To Cart</a> <a href="ct_san_pham.php?Masp='.$row['Masp'].'" class="btn btn-primary" role="button">See Details</a></p>
                                </div>
                            </div>
                        </div>
                        ';
                        
                    }
                    echo "</div";
                    
      include 'pagination.php';
      //           <!-- /.row -->
      //           <div>
      //               <ol class="breadcrumb">
      //                   <li><a href="#">Home</a></li>
      //                   <li><a href="#">Clothing</a></li>
      //                   <li class="active">Men's Clothing</li>
      //               </ol>
      //           </div>
      //           <!-- /.div -->
      //           <div class="row">
      //               <div class="btn-group alg-right-pad">
      //                   <button type="button" class="btn btn-default"><strong>3005  </strong>items</button>
      //                   <div class="btn-group">
      //                       <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      //                           Sort Products &nbsp;
      // <span class="caret"></span>
      //                       </button>
      //                       <ul class="dropdown-menu">
      //                           <li><a href="#">By Price Low</a></li>
      //                           <li class="divider"></li>
      //                           <li><a href="#">By Price High</a></li>
      //                           <li class="divider"></li>
      //                           <li><a href="#">By Popularity</a></li>
      //                           <li class="divider"></li>
      //                           <li><a href="#">By Reviews</a></li>
      //                       </ul>
      //                   </div>
      //               </div>
      //           </div>
      //           <!-- /.row -->
      //           <div class="row">
      //               <div class="col-md-4 text-center col-sm-6 col-xs-6">
      //                   <div class="thumbnail product-box">
      //                       <img src="assets/img/dummyimg.png" alt="" />
      //                       <div class="caption">
      //                           <h3><a href="#">Samsung Galaxy </a></h3>
      //                           <p>Price : <strong>$ 3,45,900</strong>  </p>
      //                           <p><a href="#">Ptional dismiss button </a></p>
      //                           <p>Ptional dismiss button in tional dismiss button in   </p>
      //                           <p>
      //                               <a href="#" class="btn btn-success" role="button">Add To Cart</a>
      //                               <a href="#" class="btn btn-primary" role="button">See Details</a>
      //                           </p>
      //                       </div>
      //                   </div>
      //               </div>
      //               <!-- /.col -->
      //               <div class="col-md-4 text-center col-sm-6 col-xs-6">
      //                   <div class="thumbnail product-box">
      //                       <img src="assets/img/dummyimg.png" alt="" />
      //                       <div class="caption">
      //                           <h3><a href="#">Samsung Galaxy </a></h3>
      //                           <p>Price : <strong>$ 3,45,900</strong>  </p>
      //                           <p><a href="#">Ptional dismiss button </a></p>
      //                           <p>Ptional dismiss button in tional dismiss button in   </p>
      //                           <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
      //                       </div>
      //                   </div>
      //               </div>
      //               <!-- /.col -->
      //               <div class="col-md-4 text-center col-sm-6 col-xs-6">
      //                   <div class="thumbnail product-box">
      //                       <img src="assets/img/dummyimg.png" alt="" />
      //                       <div class="caption">
      //                           <h3><a href="#">Samsung Galaxy </a></h3>
      //                           <p>Price : <strong>$ 3,45,900</strong>  </p>
      //                           <p><a href="#">Ptional dismiss button </a></p>
      //                           <p>Ptional dismiss button in tional dismiss button in   </p>
      //                           <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
      //                       </div>
      //                   </div>
      //               </div>
      //               <!-- /.col -->
      //           </div>
      //           <!-- /.row -->
      //           <div class="row">
      //               <ul class="pagination alg-right-pad">
      //                   <li><a href="#">&laquo;</a></li>
      //                   <li><a href="#">1</a></li>
      //                   <li><a href="#">2</a></li>
      //                   <li><a href="#">3</a></li>
      //                   <li><a href="#">4</a></li>
      //                   <li><a href="#">5</a></li>
      //                   <li><a href="#">&raquo;</a></li>
      //               </ul>
      //           </div>';

}
?>