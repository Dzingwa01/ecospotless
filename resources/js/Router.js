import React from 'react';
import PropTypes from 'prop-types';
import { BrowserRouter, Route, Link,Switch } from "react-router-dom";
import SignIn from "./components/SignIn";
import Master from './components/Master';
import Register from './components/Register';
import Dashboard from "./components/Dashboard";

class Router extends React.Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Master />
                    <Switch>
                        <Route path="/login" component={SignIn} />
                        <Route path="/register" component={Register} />
                        <Route path="/dashboard" component={Dashboard} />
                    </Switch>
                </div>
            </BrowserRouter>
        );
    }
}

export default Router;