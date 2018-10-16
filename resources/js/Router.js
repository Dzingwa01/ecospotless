import React from 'react';
import {withRouter} from 'react-router';
import { BrowserRouter, Route, Link,Switch,Redirect } from "react-router-dom";
import Landing from "./components/Landing";
import Roles from "./components/admin/Roles";
import AdminHome from "./components/admin/Home";
import Users from "./components/admin/Users";

import PropTypes from 'prop-types';
class Router extends React.Component {

    render() {
               return (
                <div>
                    <Switch>
                        <Route exact path="/dashboard" render={(routeProps) => <AdminHome {...routeProps} />}/>
                        <Route path="/roles" render={(routeProps) => <Roles {...routeProps} />} />
                        <Route path="/users" render={(routeProps) => <Users {...routeProps} />} />
                        <Redirect to="/dashboard"/>
                    </Switch>
                </div>
        );
    }
}


export default Router;