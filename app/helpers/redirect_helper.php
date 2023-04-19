<?php
function redirect($page): void{
    header('location: ' . URLROOT . '/' . $page);
}