import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import withStyles from '@material-ui/core/styles/withStyles';
import { ValidatorForm, TextValidator} from 'react-material-ui-form-validator';
import axios from 'axios';
import MUIDataTable from "mui-datatables";

const styles = theme => ({
    layout: {
        width: 'auto',
        display: 'block', // Fix IE11 issue.
        marginLeft: theme.spacing.unit * 3,
        marginRight: theme.spacing.unit * 3,
        [theme.breakpoints.up(400 + theme.spacing.unit * 3 * 2)]: {
            width: 400,
            marginLeft: 'auto',
            marginRight: 'auto',
        },
    },
    paper: {
        marginTop: theme.spacing.unit * 8,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        padding: `${theme.spacing.unit * 2}px ${theme.spacing.unit * 3}px ${theme.spacing.unit * 3}px`,
    },
    row: {
        display: 'flex',
        justifyContent: 'center',
    },

    form: {
        width: '100%', // Fix IE11 issue.
        marginTop: theme.spacing.unit,
    },
    submit: {
        marginTop: theme.spacing.unit * 3,
    },
    textField: {
        marginLeft: theme.spacing.unit,
        marginRight: theme.spacing.unit,
        width: 200,
    },
    dense: {
        marginTop: 19,
    },
    menu: {
        width: 200,
    },
    close: {
        padding: theme.spacing.unit / 2,
    },
});

class Users extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            users:[]
        };

        this.handleChange =this.handleChange.bind(this);
        this.handleSubmit =this.handleSubmit.bind(this);
    }

    componentDidMount() {

    }

    componentWillUnmount() {

    }

    handleChange (event){
        let name = event.target.name;
        let user = this.state.user;
        user[name] = event.target.value;
        this.setState({user:user});
    }

    handleSubmit (e){
        e.preventDefault();
        let component = this;
        let user = this.state.user;
        console.log("cur user",user);
        axios.post('/register',user).then(function(response){
            console.log('Check out the response',response.data);
            component.setState({message:response.data.message,open:true});

        }).catch((error)=>{

            this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});

        });
    }

    render() {
        const {classes} = this.props;
        const {role} = this.state;
        const columns = ["Name","Surname","Email", "Phone","Role"];
        const data = [

        ];
        const options = {
            filterType: 'checkbox',
        };
        return (
            <Paper>
                <MUIDataTable
                    title={"Roles List"}
                    data={data}
                    columns={columns}
                    options={options}
                />
                {/*<ValidatorForm*/}
                {/*ref="form"*/}
                {/*onSubmit={this.handleSubmit}*/}
                {/*onError={errors => console.log(errors)}*/}
                {/*>*/}
                {/*<TextValidator*/}
                {/*label="Role Name"*/}
                {/*onChange={this.handleChange}*/}
                {/*name="name"*/}
                {/*value={role.name}*/}
                {/*validators={['required']}*/}
                {/*errorMessages={['this field is required']}*/}
                {/*/>*/}
                {/*<Button type="submit">Submit</Button>*/}
                {/*</ValidatorForm>*/}
            </Paper>
        );
    }
}

export default withStyles(styles)(Users);