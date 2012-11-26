<?php
interface IService {
	public function create($class);
	public function read();
	public function readById($id);
	public function update($class);
	public function delete($id);
}
?>