<?php

class DonationController {

    public function ctrAll($table) {
        return DonationModel::mdlAll($table);
    }

    public function ctrGraph($table) {
        return DonationModel::mdlGraph($table);
    }
}
?>