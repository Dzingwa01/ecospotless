import React from 'react';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import ListSubheader from '@material-ui/core/ListSubheader';
import DashboardIcon from '@material-ui/icons/Dashboard';
import ShoppingCartIcon from '@material-ui/icons/ShoppingCart';
import PeopleIcon from '@material-ui/icons/People';
import BarChartIcon from '@material-ui/icons/BarChart';
import LayersIcon from '@material-ui/icons/Layers';
import AssignmentIcon from '@material-ui/icons/Assignment';
import Divider from '@material-ui/core/Divider';
// import { Link } from 'react-router-dom';
import { BrowserRouter, Route, Link,Switch,Redirect } from "react-router-dom";

export default class Navigation extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>

                <ListItem button component={Link} to='/dashboard'>
                    <ListItemIcon>
                        <DashboardIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Dashboard"/>
                </ListItem>
                <ListItem button>
                    <ListItemIcon>
                        <ShoppingCartIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Wash Requests"/>
                </ListItem>
                <ListItem button>
                    <ListItemIcon>
                        <PeopleIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Customers"/>
                </ListItem>
                <ListItem button>
                    <ListItemIcon>
                        <BarChartIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Reports"/>
                </ListItem>

                {/*<Divider/>*/}
                <ListSubheader inset>Settings</ListSubheader>
                <ListItem button component={Link} to='/users'>
                    <ListItemIcon>
                        <PeopleIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Users"/>
                </ListItem>

                <ListItem button component={Link} to='/roles'>
                    <ListItemIcon>
                        <AssignmentIcon/>
                    </ListItemIcon>
                    <ListItemText primary="Roles"/>
                </ListItem>
            </div>

        );

    }
}
