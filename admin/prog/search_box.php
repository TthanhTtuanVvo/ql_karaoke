<div class="form-group search_product"><!-- 
	<h2><i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm sản phẩm:</h2> -->

	<form action="" method="GET">
		<input type="hidden" name="act" value="search_product">
		<input type="text" name="search_key" value="<?=$_GET['search_key']?>" class="ipt-key" placeholder="Nhập tên sản phẩm hoặc mã sản phẩm để tìm kiếm..."/>
		<input type="submit" name="submit" value="" class="ipt-submit " />
	</form>
</div>
<style type="text/css">
	.search_product
	{
		margin: -15px 0 35px 0;
		padding-bottom: 15px;
	}
	.search_product h2
	{
		font-size: 24px;
		position: relative;
	}
	.search_product h2 i
	{
		padding-right: 10px;
	}
	.search_product .ipt-key
	{
		width: 91%;
		line-height: 35px;
		padding-left: 15px;
		border: none;
	}
	.search_product .ipt-submit
	{
		display: inline-block;
	    width: 6%;
	    line-height: 35px;
	    position: absolute;
	    background: #3AB755 url('../images/icon-search.png') center center no-repeat;
	    border: none;
	}
@media (max-width:991px){
	.search_product {
    margin: -15px 25px 35px 0;
    padding-bottom: 15px;
	}
	.search_product .ipt-key
	{
		width: 87%;
	}
	.search_product .ipt-submit
	{
	    width: 13%;
	}
}
@media (max-width: 767px){
	.search_product .ipt-key
	{
		width: 82%;
	}
	.search_product .ipt-submit
	{
	    width: 18%;
	}
}
@media (max-width: 320px){
	.search_product .ipt-key
	{
		width: 83%;
	}
	.search_product .ipt-submit
	{
	    width: 17%;
	}
}
</style>