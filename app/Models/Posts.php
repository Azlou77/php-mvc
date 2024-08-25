<?php


namespace App\Models;


class Posts extends ModelDefault
{
    protected $post_id;
    protected $title;
    protected $content;
    protected $image;
    protected $date;

    public function __construct()
    {
        $this->table = "post";
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        return $this->title = $title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        return $this->content = $content;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        return $this->image = $image;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        return  $this->date = $date;
    }
}



    // function addPosts($title, $content, $image)
    // {
    //     $date = 'Y-m-d h-m-i';
    //     $connexion = connectBdd();
    //     $request = "INSERT INTO post (title, content, image, date) VALUES (:title, :content, :image, :date)";
    //     $request = $connexion->prepare($request);
    //     $request->bindParam(':title', $title);
    //     $request->bindParam(':content', $content);
    //     // Array to string conversion 
    //     $request->bindParam(':image', $image);
    //     $request->bindParam(':date', $date);
    //     $success = $request->execute();

    //     return $success;
    // }

    // function modifyPosts($post_id, $title, $content, $image)
    // {
    //     $connexion = connectBdd();
    //     $request = "UPDATE post SET title = :title, content = :content, image = :image WHERE post_id = :post_id";
    //     $request = $connexion->prepare($request);
    //     $request->bindParam(':post_id', $post_id);
    //     $request->bindParam(':title', $title);
    //     $request->bindParam(':content', $content);
    //     $request->bindParam(':image', $image);
    //     $success = $request->execute();
    //     return $success;
    // }

    // function getPostsInfo($id)
    // {
    //     $connexion = connectBdd();
    //     $request = "SELECT * from post WHERE post_id = :post_id";
    //     $request = $connexion->prepare($request);
    //     $request->bindParam(':post_id', $id);
    //     $request->execute([':post_id' => $id]);
    //     $results = $request->fetch(PDO::FETCH_ASSOC);
    //     return $results;
    // }

    // function deletePost($id)
    // {
    //     $connexion = connectBdd();
    //     $request = "DELETE from post WHERE post_id = :post_id";
    //     $request = $connexion->prepare($request);
    //     $request->bindParam(':post_id', $id);
    //     $success = $request->execute();
    //     return $success;
    // }
