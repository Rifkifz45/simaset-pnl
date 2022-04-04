
<?php
function countfield(){
	$tanah       = $this->FieldsModel->where('category_id', 2)->countAllResults();
	$mesin       = $this->FieldsModel->where('category_id', 3)->countAllResults();
	$gedung      = $this->FieldsModel->where('category_id', 4)->countAllResults();
	$irigasi     = $this->FieldsModel->where('category_id', 5)->countAllResults();
	$lainnya     = $this->FieldsModel->where('category_id', 6)->countAllResults();
	$konstruksi  = $this->FieldsModel->where('category_id', 7)->countAllResults();
	$takberwujud = $this->FieldsModel->where('category_id', 8)->countAllResults();

	return array($tanah, $mesin, $gedung, $irigasi, $lainnya, $konstruksi, $takberwujud);
}