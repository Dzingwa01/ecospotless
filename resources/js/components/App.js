import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import Master from './Master';
import Router from '../Router'
import { BrowserRouter, Route, Link,Switch,Redirect } from "react-router-dom";
class App extends Component {
    render () {
        return (
                <Master/>

        )
    }
}
export default App;