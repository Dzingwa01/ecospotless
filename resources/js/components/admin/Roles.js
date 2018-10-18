import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import withStyles from '@material-ui/core/styles/withStyles';
import {ValidatorForm, TextValidator} from 'react-material-ui-form-validator';
import axios from 'axios';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import MUIDataTable from "mui-datatables";
import Button from '@material-ui/core/Button';
import AddIcon from '@material-ui/icons/Add';
import Modal from '@material-ui/core/Modal';
import Checkbox from '@material-ui/core/Checkbox';
import SaveIcon from '@material-ui/icons/Save';
import Snackbar from '@material-ui/core/Snackbar';
import IconButton from '@material-ui/core/IconButton';
import CloseIcon from '@material-ui/icons/Close';


function rand() {
    return Math.round(Math.random() * 20) - 10;
}

function getModalStyle() {
    const top = 50;
    const left = 50;
    console.log("top is",top);
    console.log("left is",left);
    return {
        top: `${top}%`,
        left: `${left}%`,
        transform: `translate(-${top}%, -${left}%)`,
    };
}

const styles = theme => ({
    paper: {
        marginTop: theme.spacing.unit * 8,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        padding: `${theme.spacing.unit * 2}px ${theme.spacing.unit * 3}px ${theme.spacing.unit * 3}px`,
    },
    fabButton: {
        position: 'absolute',
        bottom: theme.spacing.unit * 4,
        right: theme.spacing.unit * 4,
    },
    row: {
        flexGrow: 1,
    },

    form: {
        width: '100%', // Fix IE11 issue.
        marginTop: theme.spacing.unit,
    },
    button: {
        margin: theme.spacing.unit,

    },
    modalPaper: {
        position: 'absolute',
        width: 350,
        alignItems:'center',
        backgroundColor: theme.palette.background.paper,
        boxShadow: theme.shadows[5],
        padding: theme.spacing.unit * 4,
        alignItems:'center',
    },
    leftIcon: {
        marginRight: theme.spacing.unit,
    },
    rightIcon: {
        marginLeft: theme.spacing.unit,
    },
    iconSmall: {
        fontSize: 20,
    },

});

class Roles extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading: true,
            role: {
                name: '',
                permissions: [],
            },
            permissions: [],
            open: false,
            curStates: [],
            data:[],
            roles:[],
            snackOpen:false,
            message:'',
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.addRole = this.addRole.bind(this);
        this.getPermissions = this.getPermissions.bind(this);
        this.handleOpen = this.handleOpen.bind(this);
        this.handleClose = this.handleClose.bind(this);
        this.handleCloseSnack = this.handleCloseSnack.bind(this);
        this.toggleCheckbox = this.toggleCheckbox.bind(this);
        this.handleDelete = this.handleDelete.bind(this);
    }

    componentDidMount() {
        this.getPermissions();
    }

    componentWillUnmount() {

    }

    handleOpen() {
        this.setState({open: true});
    };

    handleClose() {
        this.setState({open: false});
    };

    getPermissions() {
        let component = this;
        axios.get('/roles/create').then(function (response) {
            console.log("cur user", response.data.permission);
            component.setState({permissions: response.data.permission});
            let cur_perms = component.state.curStates;
            for (var i = 0; i < response.data.permission.length; i++) {
                cur_perms.push(false);
            }
            let data = component.state.data
            let roles = response.data.roles;
            for(var i=0;i<roles.length;i++){
                let temp_data = [];
                temp_data.push(roles[i].name);
                temp_data.push(roles[i].created_at);
                data.push(temp_data);
            }
            component.setState({data:data, loading: false,roles:roles,message:response.data.message});
            console.log('Check out the permissions', component.state.permissions);
        }).catch((error) => {
            // this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});
            console.log("Error", error);
            component.setState({
                permissions: [],
                loading: false,
                message: "Error occured please contact support@ecospotless.co.za",
                open: false
            });
        });
    }

    addRole() {
        alert("clicked");
    }

    handleChange(event) {
        let name = event.target.name;
        let role = this.state.role;
        role[name] = event.target.value;
        this.setState({role: role});
    }

    toggleCheckbox(event) {
        const {role, permissions, curStates} = this.state;
        let permList = permissions.map(perm=>perm.id.toString());
        if (event.target.checked) {
            let cur_index = permList.indexOf(event.target.value);
            curStates[cur_index] = true;
            role.permissions.push(event.target.value);
            this.setState({role: role, curStates: curStates});
        } else {
            let cur_index = permList.indexOf(event.target.value);
            let cur_index_2 = role.permissions.indexOf(event.target.value);
            curStates[cur_index] = false;
            role.permissions.splice(cur_index_2, 1);
            this.setState({role: role, curStates: curStates});
        }

    }

    handleDelete(deleted){
        console.log("deletingsss",deleted);

        const {roles} = this.state;
            let component = this;
            let deleted_ids = [];
            for(var i=0;i<deleted.data.length;i++){
                let role = roles[deleted.data[i].index];
                console.log(role);
                deleted_ids.push(role.id);
            }
            console.log("deleted ids",deleted_ids);
            axios.post('/delete/roles',deleted_ids).then(function(response){
                console.log("check response",response.data);
                let data = [];
                let roles = response.data.roles;
                for(var i=0;i<roles.length;i++){
                    let temp_data = [];
                    temp_data.push(roles[i].name);
                    temp_data.push(roles[i].created_at);
                    data.push(temp_data);
                }
                component.setState({message:response.data.message,data:data,snackOpen:true});
            });
    }

    handleSubmit(e) {
        e.preventDefault();
        let component = this;
        let role = this.state.role;
        console.log("cur user", role);
        axios.post('/roles',role).then(function(response){
            console.log('Check out the response',response.data);
            let data = component.state.data
            let roles = response.data.role;
              let temp_data = [];
              temp_data.push(roles.name);
              temp_data.push(roles.created_at);
              data.push(temp_data);
            component.setState({message:response.data.message,open:false,data:data,snackOpen:true});

        }).catch((error)=>{

            this.setState({message:"Error occured please contact support@ecospotless.co.za",open:true});

        });
    }

    handleCloseSnack(event, reason){
        this.setState({ snackOpen: false });
    };

    render() {
        const {classes} = this.props;
        const {role, permissions, loading, curStates,data,message} = this.state;
        const columns = ["Name", "Created At"];
        const options = {
            filterType: 'checkbox',
            resizableColumns:true,
            onRowsDelete:this.handleDelete,
        };
        return (
            <div className={classes.root}>
                <Paper elevation={2}>
                    <div>
                        <Button variant="fab" color="secondary" aria-label="Add" className={classes.fabButton}
                                onClick={this.handleOpen}>
                            <AddIcon/>
                        </Button>
                    </div>
                    <MUIDataTable
                        title={"Roles List"}
                        data={data}
                        columns={columns}
                        options={options}
                    />
                    <Modal
                        aria-labelledby="roles-modal-title"
                        aria-describedby="role-modal-description"
                        open={this.state.open}
                        onClose={this.handleClose}
                    >
                        <div className={classes.modalPaper} style={getModalStyle()}>
                            <Typography variant="h6" id="modal-title">
                                Add New Role
                            </Typography>
                            {!loading && (
                                <ValidatorForm
                                    ref="form"
                                    onSubmit={this.handleSubmit}
                                    onError={errors => console.log(errors)}
                                >
                                    <TextValidator
                                        label="Role Name"
                                        onChange={this.handleChange}
                                        name="name"
                                        value={role.name}
                                        validators={['required']}
                                        errorMessages={['this field is required']}
                                    />
                                    <br/>

                                    <div>{
                                        permissions.map((permission, index) => (
                                            <FormControlLabel key={index} control={
                                                <Checkbox

                                                    checked={curStates[index]}
                                                    onChange={this.toggleCheckbox}
                                                    value={permission.id.toString()}
                                                />
                                            } label={permission.name}/>
                                        ))
                                    }
                                    </div>
                                    <Button variant="contained" className={classes.button} color="primary"
                                            type="submit"> <SaveIcon
                                        className={classNames(classes.leftIcon, classes.iconSmall)}/>Submit</Button>
                                </ValidatorForm>)
                            }
                        </div>
                    </Modal>
                    <Snackbar
                        anchorOrigin={{
                            vertical: 'bottom',
                            horizontal: 'left',
                        }}
                        open={this.state.snackOpen}
                        autoHideDuration={6000}
                        onClose={this.handleCloseSnack}
                        ContentProps={{
                            'aria-describedby': 'message-id',
                        }}
                        message={<span id="message-id">{message}</span>}
                        action={[
                            <Button key="undo" color="secondary" size="small" onClick={this.handleCloseSnack}>
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
                </Paper>
            </div>
        );
    }
}

Roles.propTypes = {
    classes: PropTypes.object.isRequired,
}
export default withStyles(styles)(Roles);