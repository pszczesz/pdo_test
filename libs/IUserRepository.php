<?php

interface IUserRepository {

    function GetUser(User $user);

    function GetAllUsers();

    function UpdateUser(User $user);

    function AddUser(User $user);

    function DeleteUser(User $user);
}
