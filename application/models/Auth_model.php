<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

function __construct() {
parent::__construct();
$this->load->helper('url'); //������, ����� ������� redirect
}

function login() //������� �����������
{
$login = $this->input->post('login'); //��������� ������ �� ���������� ���� �����
$password = $this->input->post('password');//��������� ������ �� ���������� ���� ������
$query = $this->db->query("SELECT * FROM users WHERE login='$login' AND password='$password'"); //��������� � ���� ������
//� �������� ������� ��� �� ������� user, ��� ����� � ������ - ��, ��� ������� � �����
if(isset($_POST['login_submit'])) //���� ������ ������ �����
{
if($query) //���� ������ �������� �������
{
if($this->db->affected_rows($query) > 0) //���� ������ ����� ���������� ����� ������ 0
{
redirect('/Gallery/album/'); //�������������� �� ������� ��������
}
else //���� ������ ������������ ���
{
echo '<script>alert("������ �����!");</script>'; //������� ���������
}
}
else //���� ������ �� ������
{
echo '<script>alert("������!");</script>'; //������� ���������
}
}
}
}