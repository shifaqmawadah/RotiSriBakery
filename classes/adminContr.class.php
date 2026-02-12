<?php 

class adminContr extends Admin {

    public function usersList() {
        try {
            $this->searchMember();
        } catch (Exception $e) {
            echo "Error in fetching users list: " . $e->getMessage();
        }
    }

    public function showInspectedUser() {
        try {
            $this->inspectUser();
        } catch (Exception $e) {
            echo "Error in showing inspected user: " . $e->getMessage();
        }
    }

    public function productsList() {
        try {
            $this->showProduct();
        } catch (Exception $e) {
            echo "Error in fetching products list: " . $e->getMessage();
        }
    }

    public function showInspectedProduct() {
        try {
            $this->inspectProduct();
        } catch (Exception $e) {
            echo "Error in showing inspected product: " . $e->getMessage();
        }
    }

    public function showSearchMember() {
        try {
            $this->searchMembers();
        } catch (Exception $e) {
            echo "Error in searching members: " . $e->getMessage();
        }
    }

    public function showReviews() {
        try {
            $this->adminReviews();
        } catch (Exception $e) {
            echo "Error in showing reviews: " . $e->getMessage();
        }
    }
}