import React from 'react';
import PropTypes from 'prop-types';
import Avatar from '@material-ui/core/Avatar';
import Button from '@material-ui/core/Button';
import CssBaseline from '@material-ui/core/CssBaseline';
import FormControl from '@material-ui/core/FormControl';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import Input from '@material-ui/core/Input';
import InputLabel from '@material-ui/core/InputLabel';
import classNames from 'classnames';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import withStyles from '@material-ui/core/styles/withStyles';
import { ValidatorForm, TextValidator} from 'react-material-ui-form-validator';
import axios from 'axios';
import Snackbar from '@material-ui/core/Snackbar';
import IconButton from '@material-ui/core/IconButton';
import CloseIcon from '@material-ui/icons/Close';
import Image from 'material-ui-image';
import Select from '@material-ui/core/Select';
import MenuItem from '@material-ui/core/MenuItem';

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
    avatar: {
        margin: 10,
    },
    bigAvatar: {
        width: 300,
        height: 200,
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
    formControl: {
        margin: theme.spacing.unit,
        minWidth: 160,
    },
    selectEmpty: {
        marginTop: theme.spacing.unit * 2,
    },
});

class Register extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            user: {
            'email':'',
            'surname':'',
            'name':'',
            'contact_number':'',
            'password':'',
            'password_confirmation':'',
                'role':''
        },
            open:false,
            message:'',
        };

        this.handleChange =this.handleChange.bind(this);
        this.handleSubmit =this.handleSubmit.bind(this);
        this.handleClose =this.handleClose.bind(this);
    }

    handleClose(event, reason){
        if (reason === 'clickaway') {
            window.location.href = '/login';
            return;
        }
        window.location.href = '/login';
        this.setState({ open: false });
    };

    componentDidMount() {

    }

    componentWillUnmount() {

    }
    handleChange (event){
        let name = event.target.name;
        let user = this.state.user;
        console.log("name ",name);
        user[name] = event.target.value;
        this.setState({user:user});
        console.log("namusere ",this.state.user);
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
        const {user,message} = this.state;
        return (
            <React.Fragment>
                <CssBaseline/>
                <main className={classes.layout}>
                    <Paper className={classes.paper}>
                        <img
                            alt="Logo"
                            src="/images/logo.jpg"
                            className={classNames(classes.avatar, classes.bigAvatar)}
                        />
                        <Typography component="h1" variant="h5">
                            Register
                        </Typography>
                        <form className={classes.form} onSubmit={this.handleSubmit}>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="name">Name</InputLabel>
                                <Input id="name" name="name" autoComplete="name" onChange={this.handleChange} value={user.name} autoFocus />
                            </FormControl>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="surname">Surname</InputLabel>
                                <Input id="surname" name="surname" autoComplete="surname" onChange={this.handleChange} value={user.surname} />
                            </FormControl>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="email">Email Address</InputLabel>
                                <Input id="email" name="email" autoComplete="email" onChange={this.handleChange} value={user.email}  />
                            </FormControl>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="contact_number">Contact Number</InputLabel>
                                <Input id="contact_number" name="contact_number" onChange={this.handleChange} autoComplete="contact_number" value={user.contact_number} />
                            </FormControl>
                            <FormControl className={classes.formControl}>
                                <InputLabel htmlFor="age-simple">Select Account type</InputLabel>
                                <Select required
                                    value={user.role}
                                    onChange={this.handleChange}
                                    inputProps={{
                                        name: 'role',
                                        id: 'role-select',
                                    }}
                                >
                                    <MenuItem value="client">Client</MenuItem>
                                    <MenuItem value="cleaner">Cleaner</MenuItem>

                                </Select>
                            </FormControl>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="password">Password</InputLabel>
                                <Input
                                    name="password"
                                    type="password"
                                    id="password"
                                    value={user.password}
                                    onChange={this.handleChange}
                                    autoComplete="current-password"
                                />
                            </FormControl>
                            <FormControl margin="normal" required fullWidth>
                                <InputLabel htmlFor="password_confirmation">Password</InputLabel>
                                <Input
                                    name="password_confirmation"
                                    type="password"
                                    id="password_confirmation"
                                    value={user.password_confirmation}
                                    autoComplete="confirm_password"
                                    onChange={this.handleChange}
                                />
                            </FormControl>
                            <FormControlLabel
                                control={<Checkbox value="remember" color="primary" />}
                                label="Agree to Terms"
                            />
                            <Button
                                type="submit"
                                fullWidth
                                variant="contained"
                                color="primary"
                                className={classes.submit}
                            >
                                Register
                            </Button>
                        </form>

                    </Paper>

                </main>
                <Snackbar
                    anchorOrigin={{
                        vertical: 'bottom',
                        horizontal: 'left',
                    }}
                    open={this.state.open}
                    autoHideDuration={6000}
                    onClose={this.handleClose}
                    ContentProps={{
                        'aria-describedby': 'message-id',
                    }}
                    message={<span id="message-id">{message}</span>}
                    action={[
                        <Button key="undo" color="secondary" size="small" onClick={this.handleClose}>
                            OK
                        </Button>,
                        <IconButton
                            key="close"
                            aria-label="Close"
                            color="inherit"
                            className={classes.close}
                            onClick={this.handleClose}
                        >
                            <CloseIcon />
                        </IconButton>,
                    ]}
                />
            </React.Fragment>

        );
    }
}

Register.propTypes = {
    classes: PropTypes.object.isRequired,
    SelectInput:PropTypes.object.isRequired
};

export default withStyles(styles)(Register);