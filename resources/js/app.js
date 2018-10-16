/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter, Route, Link,Switch,Redirect } from "react-router-dom";
import App from "./components/App";
import Master from "./components/Master";


render(
    <App/>,
    document.getElementById('app'));
