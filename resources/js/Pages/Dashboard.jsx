import InputError from "@/Components/InputError";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";

export default function Dashboard({ auth }) {
    const { data, setData, post, errors } = useForm({
        url: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("dashboard.store"));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <form onSubmit={handleSubmit}>
                                <input
                                    type="text"
                                    placeholder="https://google.com"
                                    className="w-full border border-gray-300 rounded-md py-2 px-4 mb-2"
                                    value={data.url}
                                    onChange={(e) =>
                                        setData("url", e.target.value)
                                    }
                                />

                                {/* {errors && JSON.stringify(errors)} */}

                                <InputError
                                    message={errors.url}
                                    className="mb-4"
                                />

                                <PrimaryButton type="submit">Add</PrimaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
