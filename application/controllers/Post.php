<?php

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("post_model");

        $user = $this->session->userdata("user");
        if (!$user) {
            redirect(base_url("giris-yap"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->user = $this->session->userdata("user");
        //$viewData->posts = $this->post_model->get_all();
        $viewData->posts = $this->post_model->post_list();
        $this->load->view("post_list", $viewData);
    }

    public function vote()
    {
        $post_id = $this->input->post("post_id");
        $vote_status = $this->input->post("vote_status");
        $user_id = $this->session->userdata("user")->id;

        // echo "post_id : $post_id --- vote : $vote_status --- user_id : $user_id";

        $this->load->model("vote_model");

        $vote = $this->vote_model->get(array(
            "user_id" => $user_id,
            "post_id" => $post_id
        ));

        if ($vote) {

            if ($vote->vote_status == $vote_status) {
                $new_vote_status = 0;
            } else {
                $new_vote_status = $vote_status;
            }
            $update = $this->vote_model->update(array(
                "user_id" => $user_id,
                "post_id" => $post_id,
                "vote_status" => $new_vote_status
            ),
                array(
                    "id" => $vote->id
                ));

        } else {
            $insert = $this->vote_model->add(array(
                "user_id" => $user_id,
                "post_id" => $post_id,
                "vote_status" => $vote_status
            ));
        }
        //Tüm içeriği Render Page ile çekme
        //$renderData["posts"] = $this->post_model->post_list();
        //echo $this->load->view("renders/post_list_render", $renderData, true);

        //Tek içeriği Render Page ile çekme.
        $renderData["post"] = $this->post_model->get_post($post_id);
        echo $this->load->view("renders/post_render", $renderData, true);
    }
}